@foreach ($users as $item ) <!-- ini gw bingung dpt dri mana, tp bisa ngambil data sesuai dgn id keren dah laravel -->
  <!-- Modal -->
  <div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-success text-white">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  {{-- knp categories? knp tdk CategoryController? karena dia ngambil dari web.php --}}
                  <form action="{{ url('users/' . $item->id ) }}" method="POST">
                      @method('PUT')
                      @csrf
                      <div class="form-group mb-3">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                              id="name" value="{{ old('name', $item->name) }}">
                          @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group mb-3">
                          <label for="name">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                              id="email" value="{{ old('email', $item->email) }}">
                          @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group mb-3">
                        <label for="name">Password <small>(kosongkan jika tidak diubah)</small> </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Konfirmasi password</label>
                        <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" name="password_confirmation"
                            id="konfirmasi_password" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
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

