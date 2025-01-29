<x-layout>
    
    <div class="col-12 pt-3">
        <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Akun</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
    
              </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</x-layout>