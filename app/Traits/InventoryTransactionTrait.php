<?php

namespace App\Traits;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Account;
use App\Models\User;
use Exception;

trait InventoryTransactionTrait
{
    use GeneralLedgerTrait;

    /**
     * Record inventory transaction (purchase or sale) in the General Ledger.
     *
     * @param Product $product
     * @param int $quantity
     * @param float $unitPrice
     * @param string $transactionType Transaction type ('purchase' or 'sale')
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function recordInventoryTransaction(Product $product, int $quantity, float $unitPrice, string $transactionType, User $user)
    {
        $description = ($transactionType === 'purchase') ? "Inventory purchase: {$product->name}" : "Inventory sale: {$product->name}";
        $accountType = ($transactionType === 'purchase') ? 'debit' : 'credit';

        $details = [
            [
                'entryable_id' => $product->id,
                'entryable_type' => Product::class,
                'account_id' => $this->getAccountId('Stock-in-Trade'), // Inventory account ID
                'type' => $accountType,
                'total_amount' => $unitPrice * $quantity,
            ],
        ];

        $this->generateGL($description, $details, 'Reference', $transactionType, $user);

        if ($transactionType === 'purchase') {
            $this->increaseInventory($product, $quantity, $unitPrice);
        } elseif ($transactionType === 'sale') {
            $this->decreaseInventory($product, $quantity);
            $this->recordSaleTransaction($product, $quantity, $unitPrice, $user);
        }
    }

    /**
     * Increase inventory quantity for a purchase transaction.
     *
     * @param Product $product
     * @param int $quantity
     * @param float $unitPrice
     * @return void
     */
    protected function increaseInventory(Product $product, $quantity, $unitPrice)
    {
        $updatedQuantity = $product->quantity + $quantity;
        $product->update([
            'quantity' => $updatedQuantity,
            'unit_price' => $unitPrice,
            'value' => $updatedQuantity * $unitPrice,
        ]);
    }

    /**
     * Decrease inventory quantity for a sale transaction.
     *
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    protected function decreaseInventory(Product $product, int $quantity)
    {
        $updatedQuantity = $product->quantity - $quantity;
        $product->update([
            'quantity' => $updatedQuantity,
            'value' => $updatedQuantity * $product->unit_price,
        ]);
    }

    /**
     * Record a sale transaction in the 'sales' table.
     *
     * @param Product $product
     * @param int $quantity
     * @param float $unitPrice
     * @param User $user
     * @return void
     */
    protected function recordSaleTransaction(Product $product, int $quantity, float $unitPrice, User $user)
    {
        $totalAmount = $quantity * $unitPrice;

        Sale::create([
            'date' => now(),
            'party_name' => 'Customer Name',
            'product_id' => $product->id,
            'qty' => $quantity,
            'rate' => $unitPrice,
            'percent' => 0.00,
            'amount' => $totalAmount,
            'previous_balance' => 0.00,
        ]);

        // Additional journal entry for sales revenue
        $details = [
            [
                'entryable_id' => $product->id,
                'entryable_type' => Product::class,
                'account_id' => $this->getAccountId('Revenue'), // Revenue account ID
                'type' => 'credit',
                'total_amount' => $totalAmount,
            ],
            [
                'entryable_id' => $product->id,
                'entryable_type' => Product::class,
                'account_id' => $this->getAccountId('Cost of Goods Sold'), // COGS account ID
                'type' => 'debit',
                'total_amount' => $unitPrice * $quantity,
            ],
        ];

        $this->generateGL('Sale Transaction', $details, 'Sale Reference', 'sale', $user);
    }

    /**
     * Get the account ID based on account name or number.
     *
     * @param string $accountNameOrNumber
     * @return int|null
     */
    protected function getAccountId($accountNameOrNumber)
    {
        $account = Account::where('name', $accountNameOrNumber)
            ->orWhere('account_number', $accountNameOrNumber)
            ->first();

        return $account ? $account->id : null;
    }
}
