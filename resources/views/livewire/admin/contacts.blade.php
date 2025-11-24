<div>
    @livewire('admin.consoles')
    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-yellow">Semua Kontak</h4>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="javascript:;" wire:click="addCategory()" class="btn btn-success btn-sm">+</a> --}}
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody id="sortable_categories">
                            @forelse ($contacts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>
                                        <div class="table-actions">
                                            {{-- <a href="javascript:;" wire:click="editCategory({{ $item->id }})"
                                                class="text-primary mx-2">
                                                <i class="dw dw-edit2"></i>
                                            </a> --}}
                                            <a href="javascript:;" wire:click="deleteContact({{ $item->id }})"
                                                class="text-danger mx-2">
                                                <i class="dw dw-delete-3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Contact Us Found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
