  @foreach ($categories as $item)
      <!-- ini sakti bsa mngmbil sesuai dgn id pdhl ini dari methd index -->
      <!-- Modal -->
      <div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header bg-success text-white">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ url('categories/' . $item->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror"
                                  name="name" id="name" value="{{ old('name', $item->name) }}">
                              @error('name')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  @endforeach
