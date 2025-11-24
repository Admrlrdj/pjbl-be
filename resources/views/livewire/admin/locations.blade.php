<div>
    @livewire('admin.consoles')

    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="h4 text-yellow">All Location</h4>
                    <button class="btn btn-success btn-sm" wire:click="addLocation()">+ Add</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm table-bordered">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Maps URL</th>
                                <th>Embed</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="sortable_categories">
                            @forelse ($locations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>

                                    {{-- Maps URL dipotong biar tidak panjang --}}
                                    <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <a href="{{ $item->maps_url }}" target="_blank">Open Map</a>
                                    </td>

                                    {{-- Maps Embed juga dipotong --}}
                                    <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ Str::limit($item->maps_embed, 25) }}
                                    </td>

                                    <td class="text-center">
                                        <a href="javascript:;" wire:click="editLocation({{ $item->id }})" class="text-primary mx-2">
                                            <i class="dw dw-edit2"></i>
                                        </a>

                                        <a href="javascript:;" wire:click="deleteLocation({{ $item->id }})" class="text-danger mx-2">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Locations Found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade" id="location_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content"
                  wire:submit.prevent="{{ $isUpdateLocationMode ? 'updateLocation' : 'createLocation' }}">

                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ $isUpdateLocationMode ? 'Update Location' : 'Add Location' }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    @if ($isUpdateLocationMode)
                        <input type="hidden" wire:model="location_id">
                    @endif

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" class="form-control" wire:model="location_name" placeholder="Enter Location Name">
                        @error('location_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Address --}}
                    <div class="form-group">
                        <label>Location Address</label>
                        <input type="text" class="form-control" wire:model="location_address" placeholder="Enter Location Address">
                        @error('location_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Maps URL --}}
                    <div class="form-group">
                        <label>Location Maps URL</label>
                        <input type="text" class="form-control" wire:model="location_maps_url" placeholder="Enter Google Maps URL">
                        @error('location_maps_url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Embed --}}
                    <div class="form-group">
                        <label>Location Maps Embed</label>
                        <textarea class="form-control"
                                  wire:model="location_maps_embed"
                                  rows="3"
                                  placeholder="Paste embed iframe link"></textarea>
                        @error('location_maps_embed') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        {{ $isUpdateLocationMode ? 'Save Changes' : 'Create' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
