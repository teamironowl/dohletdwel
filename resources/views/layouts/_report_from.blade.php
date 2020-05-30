<!-- topup model to confirm email address -->
<div class="modal fade shadow" id="reportForm" tabindex="-1" role="dialog" aria-labelledby="reportFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content card">
            <div class="modal-header cart-header"> <b>လိုအပ်သည့်နေရာများကူညီပေးနိုင်ရန်</b> </div>
                <div class="modal-body card-body">
                    <form method="POST" action="{{ route('reportForm.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="state_division" class="col-md-4 col-form-label text-md-right">ပြည်နယ်/ တိုင်း</label>
                            <div class="col-md-8">
                                <select id="state_division" name="state_division" class="custom-select">
                                    <option value="" selected disable>ပြည်နယ်/ တိုင်းကိုရွေးပါ</option>
                                    @foreach($all_divisions ?? [] as $division)
                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                    <p class="text-danger">{{$errors->first('state_division')}}</p>
                                </select>
                                @error('state_division')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="township_id" class="col-md-4 col-form-label text-md-right">မြို့နယ်</label>
                            <div class="col-md-8">
                                <select name="township_id" id="township_id" class="custom-select @error('township_id') is-invalid @enderror">
                                    <option value="" selected disable>မြို့နယ်ကိုရွေးပါ</option>
                                </select>
                                @error('township_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="basic_need" class="col-md-4 col-form-label text-md-right">လိုအပ်သည့်အရာ</label>
                            <div class="col-md-8">
                                <input id="basic_need" placeholder="ခေါင်းစဥ်" type="text" class="form-control @error('basic_need') is-invalid @enderror" name="basic_need" value="{{ old('basic_need') }}" required>
                                @error('basic_need')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">ဖြည့်စွက်ချက်</label>

                            <div class="col-md-8">
                                <textarea name="description" placeholder="အကူအညီလိုအပ်သည့် အသေးစိပ်" id="description" class="form-control"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="affect_people" class="col-md-4 col-form-label text-md-right">ဘေးသင့်လူဦးရေ</label>

                            <div class="col-md-8">
                                <input id="affect_people" type="number" placeholder="အရေအတွက်ဖော်ပြပါ။" class="form-control @error('affect_people') is-invalid @enderror" name="affect_people" value="{{ old('affect_people') }}" required>

                                @error('affect_people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</label>

                            <div class="col-md-8">
                                <input id="phone" placeholder="09XXXXXXXXX" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="report_by" class="col-md-4 col-form-label text-md-right">တင်ပြသူအမည်</label>

                            <div class="col-md-8">
                                <input id="name" type="text" placeholder="ဦး/ ဒေါ်"
                                class="form-control @error('report_by') is-invalid @enderror" name="report_by" value="{{ old('report_by') }}" required>

                                @error('report_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    အတည်ပြုရန်
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>