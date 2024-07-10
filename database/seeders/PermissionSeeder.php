<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define permissions
        $permissions = [
            ['name' => 'manage_users', 'description' => 'Allows creating, editing, and deleting user accounts'],
            ['name' => 'reset_user_passwords', 'description' => 'Allows resetting user passwords'],
            ['name' => 'view_user_logs', 'description' => 'Allows viewing user activity logs'],
            ['name' => 'manage_roles', 'description' => 'Allows managing roles and their permissions'],
            ['name' => 'assign_permissions', 'description' => 'Allows assigning permissions to roles'],
            ['name' => 'manage_settings', 'description' => 'Allows configuring system settings and preferences'],
            ['name' => 'define_access_controls', 'description' => 'Allows defining access controls and permissions'],
            ['name' => 'view_financial_reports', 'description' => 'Allows viewing financial reports'],
            ['name' => 'manage_financial_transactions', 'description' => 'Allows managing financial transactions'],
            ['name' => 'track_stock_movements', 'description' => 'Allows tracking stock movements and inventory changes'],
            ['name' => 'manage_sales_orders', 'description' => 'Allows managing sales orders and transactions'],
            ['name' => 'manage_customers', 'description' => 'Allows managing customer records and interactions'],
            ['name' => 'manage_purchase_orders', 'description' => 'Allows managing purchase orders and transactions'],
            ['name' => 'manage_vendors', 'description' => 'Allows managing vendor records and interactions'],
            ['name' => 'manage_employees', 'description' => 'Allows managing employee records and HR activities'],
            ['name' => 'process_payroll', 'description' => 'Allows processing payroll and salary administration'],
            ['name' => 'manage_projects', 'description' => 'Allows managing project records and activities'],
            ['name' => 'assign_tasks', 'description' => 'Allows assigning tasks and activities to users'],
            ['name' => 'access_reports', 'description' => 'Allows accessing and viewing reports and analytics'],
            ['name' => 'customize_reports', 'description' => 'Allows customizing reports and analytics settings'],
            ['name' => 'import_data', 'description' => 'Allows importing data into the system'],
            ['name' => 'export_data', 'description' => 'Allows exporting data from the system'],
            ['name' => 'perform_system_backup', 'description' => 'Allows performing system backups and data backups'],
            ['name' => 'monitor_system_health', 'description' => 'Allows monitoring system health and performance'],
            ['name' => 'maintain_audit_trail', 'description' => 'Allows maintaining an audit trail of system activities'],
            ['name' => 'manage_security', 'description' => 'Allows managing system security settings and configurations'],
        ];

        // Insert permissions into database
        foreach ($permissions as $permissionData) {
            Permission::create($permissionData);
        }

        // Define roles and their permissions
        $roles = [
            'Owner' => [
                'manage_users', // Allows creating, editing, and deleting user accounts
                'reset_user_passwords', // Allows resetting user passwords
                'view_user_logs', // Allows viewing user activity logs

                'manage_roles', // Allows creating, editing, and deleting roles
                'assign_permissions', // Allows assigning permissions to roles

                'manage_settings', // Allows configuring system settings and preferences
                'define_access_controls', // Allows defining access controls

                'view_financial_reports', // Allows accessing financial reports and transaction history
                'manage_financial_transactions', // Allows managing financial transactions

                'manage_inventory', // Allows managing inventory
                'track_stock_movements', // Allows tracking stock movements

                'manage_sales_orders', // Allows managing sales orders
                'manage_customers', // Allows managing customers

                'manage_purchase_orders', // Allows managing purchase orders
                'manage_vendors', // Allows managing vendors

                'manage_employees', // Allows managing employees
                'process_payroll', // Allows processing payroll

                'manage_projects', // Allows managing projects
                'assign_tasks', // Allows assigning tasks

                'access_reports', // Allows accessing reports
                'customize_reports', // Allows customizing reports

                'import_data', // Allows importing data
                'export_data', // Allows exporting data

                'perform_system_backup', // Allows performing system backups
                'monitor_system_health', // Allows monitoring system health

                'maintain_audit_trail', // Allows maintaining audit trails
                'manage_security', // Allows managing security
                'manage_admins', // Ability to manage other admins
                'configure_system_settings', // Ability to configure advanced system settings
                'approve_financial_transactions', // Ability to approve financial transactions
                'override_inventory_controls', // Ability to override inventory controls
                'view_sensitive_data', // Access to sensitive data beyond financial reports
                // Add any other special permissions specific to the owner role
            ],
            'Admin' => [
                'manage_users',
                'reset_user_passwords',
                'view_user_logs',
                'manage_roles',
                'assign_permissions',
                'manage_settings',
                'define_access_controls',
                'view_financial_reports',
                'manage_financial_transactions',
                'track_stock_movements',
                'manage_sales_orders',
                'manage_customers',
                'manage_purchase_orders',
                'manage_vendors',
                'manage_employees',
                'process_payroll',
                'manage_projects',
                'assign_tasks',
                'access_reports',
                'customize_reports',
                'import_data',
                'export_data',
                'perform_system_backup',
                'monitor_system_health',
                'maintain_audit_trail',
                'manage_security',
            ],
            'Manager' => [
                'view_financial_reports',
                'manage_financial_transactions',
                'track_stock_movements',
                'manage_sales_orders',
                'manage_purchase_orders',
                'manage_projects',
                'assign_tasks',
                'access_reports',
                'import_data',
                'export_data',
                'monitor_system_health',
                'maintain_audit_trail',
            ],

            'Employee' => [
                'track_stock_movements',
                'manage_sales_orders',
                'manage_purchase_orders',
                'manage_projects',
                'assign_tasks',
                'access_reports',
            ],
        ];

        // Assign permissions to roles
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::where('name', $roleName)->first();

            if ($role) {
                $role->permissions()->sync(Permission::whereIn('name', $rolePermissions)->pluck('id'));
            }
        }
    }
}
