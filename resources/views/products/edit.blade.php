@extends('layouts.vertical', ['title' => 'Products Rex ERP', 'sub_title' => 'Products', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <div class="grid lg:grid-cols-4 gap-6">
            <div class="col-span-1 flex flex-col gap-6">
                <div class="card p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="card-title">Add Images</h4>
                        <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                            <i class="mgc_add_line"></i>
                        </div>
                    </div>

                    <form action="#" class="dropzone text-gray-700 dark:text-gray-300 h-52">
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick w-full h-full flex items-center justify-center">
                            <i class="mgc_pic_2_line text-8xl"></i>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-3 space-y-6">
                <div class="card p-6">
                    <h2 class="mb-6">Edit Product</h2>
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('products._form')

                        <div class="flex justify-end gap-3">
                            <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
