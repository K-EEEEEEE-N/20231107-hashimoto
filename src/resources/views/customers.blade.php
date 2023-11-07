@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
@endsection

@section('content')
<div class="customer-form__content">
    <div class="customer-form__heading">
        <h2>管理システム</h2>
    </div>
    <form class="form" action="/customers" method="get">
        @csrf
        <div class="form__group-name-gender">
            <div class="form__group-name">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text-name">
                        <input type="text" name="fullname" value="{{ request('fullname') }}" />
                    </div>
                </div>
            </div>
            <div class="form__group-gender">
                <div class="form__group-title-gender">
                    <span class="form__label--item">性別</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input-radio">
                        <input type="radio" id="all" name=gender value="all" {{ request('gender') == 'all' ? 'checked' : '' }} checked>
                        <label for="all">全て</label>
                        <input type="radio" id="men" name=gender value="1" {{ request('gender') == '1' ? 'checked' : '' }}>
                        <label for="men">男性</label>
                        <input type="radio" id="women" name=gender value="2" {{ request('gender') == '2' ? 'checked' : '' }}>
                        <label for="women">女性</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">登録日</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-calendar">
                    <input type="date" name="from" placeholder="from_date" value="{{ request('from') }}">
                    <p>〜</p>
                    <input type="date" name="until" placeholder="until_date" value="{{ request('until') }}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-email">
                    <input type="email" name="email" value="{{ request('email') }}">
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">検索</button>
        </div>
        <div class="form__button">
            <a href="/customers" class="form__link-reset">リセット</a>
        </div>
    </form>
</div>
<div class="customer-table__content">
    @if(isset($contacts) &&
    !$contacts->isEmpty())
    <table>
        <tr class="table__header">
            <th class="table__header-id">ID</th>
            <th class="table__header-name">お名前</th>
            <th class="table__header-gender">性別</th>
            <th class="table__header-email">メールアドレス</th>
            <th class="table__header-opinion">ご意見</th>
            <th class="table__header-delete"></th>
        </tr>
        @foreach($contacts as $contact)
        <tr class="table__row">
            <form action="{{ route('customers.destroy', ['id' => $contact->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <td class="table__row-id">{{ $contact->id }}</td>
                <td class="table__row-name">{{ $contact->fullname }}</td>
                <td class="table__row-gender">
                    @if ($contact->gender === 1)
                    男性
                    @elseif ($contact->gender === 2)
                    女性
                    @endif
                </td>
                <td class="table__row-email">{{ $contact->email }}</td>
                <td class="table__row-opinion">{{ $contact->opinion }}</td>
                <td class="table__row-delete"><button class="table__row-delete-button" type="submit" name="delete">削除</button></td>
            </form>
        </tr>
        @endforeach
        {{ $contacts->appends(request()->query())->links() }}
    </table>
    @else
    <p>該当するデータは存在しません</p>
    @endif
</div>
@endsection