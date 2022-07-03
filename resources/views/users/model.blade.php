<!-- Modal Profile -->
  <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfile" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">بياناتك الشخصية</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.Updateprofile')}}" method="POST">
            @csrf
        <div class="modal-body">
                <div class="form-group">
                  <label for="phone" class="form-label d-block text-right">رقم الهاتف:</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group">
                  <label for="BusinessName" class="form-label d-block text-right">الإسم التجارى:</label>
                  <input type="text" class="form-control" id="BusinessName" name="BusinessName" value="{{ Auth::user()->BusinessName }}"/>
                </div>
                <div class="form-group">
                  <label for="country" class="form-label d-block text-right"> البلد:</label>
                  <input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- Modal withdraw -->
<div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="withdraw" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="withdraw">بياناتك الشخصية</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.request')}}" method="POST">
            @csrf
        <div class="modal-body">
                <div class="form-group">
                  <label for="Name" class="form-label d-block text-right">الاسم:</label>
                  <input type="text" class="form-control" id="phone" name="Name">
                </div>
                <div class="form-group">
                  <label for="Email" class="form-label d-block text-right">البريد الالكتروني:</label>
                  <input type="text" class="form-control" id="Email" name="Email"/>
                </div>
                <div class="form-group">
                  <label for="password" class="form-label d-block text-right"> كلمة المرور : </label>
                  <input type="text" class="form-control" id="password" name="password"/>
                </div>
                <div class="form-group">
                    <select class="form-control select-withdraw" name="withdraw_method">
                        <option value="">اختار وسيلة سحب</option>
                        <option value="usd trc20">usd trc20</option>
                        <option value="بايير">بايير</option>
                        <option value="بيرفكت موني">بيرفكت موني</option>
                    </select>
                    <div class="withdraw-method mt-3">
                        <label for="withdraw_address" class="form-label d-block text-right"> عنوان السحب : </label>
                        <input type="text" class="form-control" id="withdraw_address" name="withdraw_address"/>
                        <label for="withdraw_value" class="form-label d-block text-right"> المبلغ المراد سحبه : </label>
                        <input type="text" class="form-control" id="withdraw_value" name="withdraw_value"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
      </div>
    </div>
  </div>
