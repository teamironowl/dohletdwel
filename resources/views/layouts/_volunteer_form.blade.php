<!-- topup model to confirm email address -->
<div class="modal fade shadow" id="volunteerForm" tabindex="-1" role="dialog" aria-labelledby="volunteerFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content card">
            <div class="modal-header cart-header"> <b>Volunteer လျောက်ထားရန်</b> </div>
                <div class="modal-body card-body">
                    <form method="POST" action="{{ route('volunteerForm.store') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="volunteer_name" class="col-md-4 col-form-label text-md-right">အမည်</label>
                            <div class="col-md-8">
                                <input id="volunteer_name" placeholder="အမည်" type="text" class="form-control @error('volunteer_name') is-invalid @enderror" name="volunteer_name" value="{{ old('volunteer_name') }}" required>
                                @error('volunteer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="volunteer_age" class="col-md-4 col-form-label text-md-right">အသက်</label>
                            <div class="col-md-8">
                                <input id="volunteer_age" placeholder="အသက်" type="number" class="form-control @error('volunteer_age') is-invalid @enderror" name="volunteer_age" value="{{ old('volunteer_age') }}" required>
                                @error('volunteer_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="volunteer_gender" class="col-md-4 col-form-label text-md-right">ကျား / မ</label>
                            <div class="col-md-8">
                                <label for="gender_male">ကျား</label>
                                <input id="gender_male" type="radio" value="male" class="ml-2 mr-4 @error('volunteer_gender') is-invalid @enderror" name="volunteer_gender" value="{{ old('volunteer_gender') }}" required>

                                <label for="gender_female">မ</label>
                                <input id="gender_female" type="radio" value="female" class="ml-2 @error('volunteer_gender') is-invalid @enderror" name="volunteer_gender" value="{{ old('volunteer_gender') }}" required>
                                @error('volunteer_gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="volunteer_phone" class="col-md-4 col-form-label text-md-right">ဖုန်းနံပါတ်</label>
                            <div class="col-md-8">
                                <input id="volunteer_phone" placeholder="ဖုန်းနံပါတ်" type="tel" class="form-control @error('volunteer_phone') is-invalid @enderror" name="volunteer_phone" value="{{ old('volunteer_phone') }}" required>
                                @error('volunteer_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="volunteer_address" class="col-md-4 col-form-label text-md-right">နေရပ်လိပ်စာ</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <select id="state_division_vlt_1" name="state_division_vlt_1" class="custom-select">
                                        <option value="" selected disable>ပြည်နယ်/ တိုင်းရွေးပါ</option>
                                        @foreach($all_divisions ?? [] as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state_division')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <select name="township_id_vlt_1" id="township_id_vlt_1" class="custom-select @error('township_id') is-invalid @enderror">
                                        <option value="" selected disable>မြို့နယ်ကိုရွေးပါ</option>
                                    </select>
                                    @error('township_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <textarea name="volunteer_address" id="volunteer_address" class="form-control mt-1"></textarea>

                                @error('volunteer_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefer_location" class="col-md-4 col-form-label text-md-right">သွားရောက်ကူညီ <br> လိုသည့်နေရာ</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <select id="state_division_vlt_2" name="state_division_vlt_2" class="custom-select">
                                        <option value="" selected disable>ပြည်နယ်/ တိုင်းရွေးပါ</option>
                                        @foreach($all_divisions ?? [] as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state_division')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <select name="township_id_vlt_2" id="township_id_vlt_2" class="custom-select @error('township_id') is-invalid @enderror">
                                        <option value="" selected disable>မြို့နယ်ကိုရွေးပါ</option>
                                    </select>
                                    @error('township_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <textarea name="prefer_location" id="prefer_location" class="form-control mt-1"></textarea>

                                @error('prefer_location')
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