<div>
    @livewire('admin.consoles')
    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-yellow">Semua Kategori</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" wire:click="addCategory()"
                            class="py-2 px-2.5 bg-green-300 text-green-600 rounded-md">+</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody id="sortable_categories">
                            @forelse ($categories as $item)
                                <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="javascript:;" wire:click="editCategory({{ $item->id }})"
                                                class="text-primary mx-2">
                                                <i class="dw dw-edit2"></i>
                                            </a>
                                            <a href="javascript:;" wire:click="deleteCategory({{ $item->id }})"
                                                class="text-danger mx-2">
                                                <i class="dw dw-delete-3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        No Categories Found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="category_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        {{-- PERBAIKAN UTAMA: Menggunakan wire:submit.prevent untuk memastikan validasi Livewire berjalan dengan benar pada submit pertama. --}}
        <form class="modal-content"
            wire:submit.prevent="{{ $isUpdateCategoryMode ? 'updateCategory()' : 'createCategory()' }}">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    {{ $isUpdateCategoryMode ? 'Update Category' : 'Add Category' }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                @if ($isUpdateCategoryMode)
                    <input type="hidden" wire:model="category_id">
                @endif
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    {{-- Input field ini seharusnya akan terikat dengan data yang dikirim oleh Livewire --}}
                    <input type="text" class="form-control" wire:model="category_name"
                        placeholder="Enter Category Name">
                    @error('category_name')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                {{-- Perbaikan: Menambahkan wire:loading.attr="disabled" dan wire:target untuk UX dan menghindari double-submit. --}}
                <button type="submit" class="btn btn-warning" wire:loading.attr="disabled"
                    wire:target="{{ $isUpdateCategoryMode ? 'updateCategory' : 'createCategory' }}">

                    {{-- Teks/spinner saat Loading --}}
                    <span wire:loading wire:target="{{ $isUpdateCategoryMode ? 'updateCategory' : 'createCategory' }}">
                        <i class="fa fa-spinner fa-spin"></i> Loading...
                    </span>

                    {{-- Teks normal saat tidak loading --}}
                    <span wire:loading.remove
                        wire:target="{{ $isUpdateCategoryMode ? 'updateCategory' : 'createCategory' }}">
                        {{ $isUpdateCategoryMode ? 'Save changes' : 'Create' }}
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
