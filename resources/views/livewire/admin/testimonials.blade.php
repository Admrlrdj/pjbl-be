<div>
    @livewire('admin.consoles')
    <div class="row">
        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-yellow">All Testimonials</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" wire:click="addTestimonial()" class="btn btn-success btn-sm">+</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="sortable_categories">
                            @forelse ($testimonials as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                        <img src="{{ asset('images/testimonials/' . $item->image) }}"
                                            style="max-height:70px;" alt="testimonial-img">
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="javascript:;" wire:click="editTestimonial({{ $item->id }})"
                                                class="text-primary mx-2">
                                                <i class="dw dw-edit2"></i>
                                            </a>
                                            <a href="javascript:;" wire:click="deleteTestimonial({{ $item->id }})"
                                                class="text-danger mx-2">
                                                <i class="dw dw-delete-3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        No Testimonials Found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="testimonial_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content"
                wire:submit="{{ $isUpdateTestimonialMode ? 'updateTestimonial()' : 'createTestimonial()' }}">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        {{ $isUpdateTestimonialMode ? 'Update Testimonial' : 'Add Testimonial' }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    @if ($isUpdateTestimonialMode)
                        <input type="hidden" wire:model="testimonial_id">
                    @endif
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" wire:model="testimonial_name"
                            placeholder="Enter Name">
                        @error('testimonial_name')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="number" class="form-control" wire:model="testimonial_rating"
                            placeholder="Enter Rating">
                        @error('testimonial_rating')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea class="form-control" wire:model="testimonial_comment" placeholder="Enter Comment" rows="3"></textarea>
                        @error('testimonial_comment')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
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
                                <img src="{{ asset('images/testimonials/' . $old_image) }}" style="max-height: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ $isUpdateTestimonialMode ? 'Save changes' : 'Create' }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
