@extends('user.layout.master')

@section('content')
<div class="container">
    <h2>Lịch sử mua truyện</h2>
    @if($purchasedStories->isEmpty())
        <p>Bạn chưa mua truyện nào.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên truyện</th>
                    <th>Chương</th>
                    <th>Giá</th>
                    <th>Ngày mua</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchasedStories as $index => $purchasedStory)
                    <tr>

                        <td>{{ $index + 1 }}</td>
                        <td><a href="{{ route('truyen.truyen',$purchasedStory->book->slug) }}">{{ $purchasedStory->book->title ?? 'Truyện không tồn tại' }}</a></td>
                        <td><a href="{{ route('truyen.chuong',[$purchasedStory->book->slug,$purchasedStory->chapter->slug]) }}">{{ $purchasedStory->chapter->title }}</a></td>
                        <td>{{ number_format($purchasedStory->price, 0, ',', '.') }} Coin</td>
                        <td>{{ \Carbon\Carbon::parse($purchasedStory->purchase_date)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
