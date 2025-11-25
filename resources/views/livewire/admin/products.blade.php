<div>
    @livewire('admin.consoles')
    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-yellow">Semua Produk</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" wire:click="addProduct()"
                            class="py-2 px-2.5 bg-green-300 text-green-600 rounded-md">+</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Ukuran Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                            <th>Best Seller</th>
                        </thead>
                        <tbody id="sortable_categories">
                            @forelse ($products as $item)
                                <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->category->name ?? '-' }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/products/' . $item->image) }}"
                                            style="max-height:70px;" alt="product-img">
                                    </td>
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
                                    <td>
                                        <div class="mt-4">
                                            <label class="flex items-center gap-2">
                                                <input type="checkbox" {{ $item->is_best_seller ? 'checked' : '' }}
                                                    wire:change="toggleBestSeller({{ $item->id }}, $event.target.checked)">


                                                <span>Jadikan Best Seller</span>
                                            </label>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">
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
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" wire:model="product_name"
                            placeholder="Enter Product Name">
                        @error('product_name')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ukuran Produk</label>
                        <input type="text" class="form-control" wire:model="product_size"
                            placeholder="Enter Product Size (gr, pcs, etc.)">
                        @error('product_size')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" class="form-control" wire:model="product_price"
                            placeholder="Enter Product Price">
                        @error('product_price')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kateogori Produk</label>
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
                        <label for="">Deskripsi Produk</label>
                        <textarea class="form-control" wire:model="product_description" placeholder="Enter Product Description" rows="3"></textarea>
                        @error('product_description')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Produk</label>
                        <input type="file" class="form-control" wire:model="image">
                        @error('image')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                        <div class="mt-2">
                            @if ($image)
                                <label>Preview Gambar Baru:</label>
                                <img src="{{ $image->temporaryUrl() }}" style="max-height: 100px;">
                            @elseif ($old_image && !$image)
                                <label>Gambar Saat Ini:</label>
                                <img src="{{ asset('images/products/' . $old_image) }}" style="max-height: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-warning">
                            {{ $isUpdateProductMode ? 'Save changes' : 'Create' }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
