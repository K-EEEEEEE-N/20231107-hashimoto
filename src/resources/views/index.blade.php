@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('script')
<script src="{{ asset('js/index.js') }}"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>
    <form class="h-adr form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-last-name">
                    <input type="text" name="last-name" value="{{ old('last-name') }}" />
                    <p>例）山田</p>
                    @error('last-name')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('last-name') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
                <div class="form__input--text-first-name">
                    <input type="text" name="first-name" value="{{ old('first-name') }}" />
                    <p>例）太郎</p>
                    @error('first-name')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('first-name') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group-gender">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-radio">
                    <input type="radio" id="men" name=gender value="男性" checked>
                    <label for="men">男性</label>
                    <input type="radio" id="women" name=gender value="女性">
                    <label for="men">女性</label>
                    @error('gender')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('gender') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-email">
                    <input type="email" name="email" value="{{ old('email') }}" />
                    <p>例）test@example.com</p>
                    @error('email')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-postcode">
                    <div class="form__input--text-postcode-input">
                        <span class="p-country-name" style="display:none;">Japan</span>
                        <span>〒</span><input type="text" class="p-postal-code" size="8" maxlength="8" name="postcode" value="{{ old('postcode') }}">
                    </div>
                    <p>例）123-4567</p>
                    @error('postcode')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('postcode') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-address">
                    <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" value="{{ old('address') }}" />
                    <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    @error('address')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('address') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-building_name">
                    <input type="text" name="building_name" value="{{ old('building_name') }}" />
                    <p>例）千駄ヶ谷マンション101</p>
                    @error('building_name')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('building_name') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="opinion">{{ old('opinion') }}</textarea>
                    @error('opinion')
                    <div class="form__error">
                        <ul>
                            @foreach ($errors->get('opinion') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection