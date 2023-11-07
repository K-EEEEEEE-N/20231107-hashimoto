@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>内容確認</h2>
    </div>
    <form class="h-adr form" action="/contacts/thanks" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-last-name">
                    <input type="text" name="last-name" value="{{ $contact['last-name'] }}" readonly />
                </div>
                <div class="form__input--text-last-name">
                    <input type="text" name="first-name" value="{{ $contact['first-name'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="form__group-gender">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-radio">
                    <input type="text" name=gender value="{{ $contact['gender'] }}" readonly>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-email">
                    <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-postcode">
                    <input type="text" name="postcode" value="{{ $contact['postcode'] }}" readonly>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-address">
                    <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-building_name">
                    <input type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="opinion" readonly>{{ $contact['opinion'] }}</textarea>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <div class="form__button">
            <button class="form__button-modify" type="submit" name="back" value="back">修正する</button>
        </div>
    </form>
</div>
@endsection