<div>
    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-yellow">All Products</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" wire:click="addProduct()" class="btn btn-success btn-sm">+</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Size</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="sortable_categories">
                            @forelse ($products as $item)
                                <tr>
                                <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->category->name ?? '-' }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ Storage::url($item->image) }}" style="max-height:70px;"
                                                alt="product-img">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="javascript:;" wire:click="editProduct({{ $item->id }})"
                                                class="text-primary mx-2">
                                                <i class="dw dw-edit2"></i>
                                            </a>
                                            <a href="javascript:;" wire:click="deleteProduct({{ $item->id }})"
                                                class="text-danger mx-2">
                                                <i class="dw dw-delete-3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        No Products Found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="product_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content"
                wire:submit="{{ $isUpdateProductMode ? 'updateProduct()' : 'createProduct()' }}">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        {{ $isUpdateProductMode ? 'Update Product' : 'Add Product' }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    @if ($isUpdateProductMode)
                        <input type="hidden" wire:model="product_id">
                    @endif
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" wire:model="product_name"
                            placeholder="Enter Product Name">
                        @error('product_name')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Size</label>
                        <input type="text" class="form-control" wire:model="product_size"
                            placeholder="Enter Product Size (gr, pcs, etc.)">
                        @error('product_size')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="number" class="form-control" wire:model="product_price"
                            placeholder="Enter Product Price">
                        @error('product_price')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Category</label>
                        <select class="form-control" wire:model="product_category_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea class="form-control" wire:model="product_description" placeholder="Enter Product Description" rows="3"></textarea>
                        @error('product_description')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ $isUpdateProductMode ? 'Save changes' : 'Create' }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
