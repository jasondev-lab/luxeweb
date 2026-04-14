{{-- Extends layout --}}
@extends('layouts.front')

@section('styles')
<style>
	.page-search {
		/* max-width: 920px; */
		margin: 0 auto;
		font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
		color: #111;
		background: #fff;
		padding-top: 20px;
	}
	.page-search__form {
		position: relative;
		margin-bottom: 0;
	}
	.page-search__icon {
		position: absolute;
		left: 14px;
		top: 50%;
		transform: translateY(-50%);
		color: #000;
		font-size: 1rem;
		pointer-events: none;
	}
	.page-search__input {
		width: 100%;
		border: 1px solid #000;
		background: #fff;
		padding: 14px 16px 14px 44px;
		font-size: 1rem;
		line-height: 1.4;
		outline: none;
	}
	.page-search__input:focus {
		box-shadow: 0 0 0 1px #000;
	}
	.page-search__divider {
		height: 1px;
		background: #d0d0d0;
		margin: 20px 0 0;
		border: 0;
	}
	.page-search__list-wrap {
		max-height: min(70vh, 640px);
		overflow-y: auto;
		margin-top: 0;
	}
	.page-search__item {
		display: flex;
		align-items: stretch;
		gap: 20px;
		padding: 20px 0;
		border-bottom: 1px solid #d0d0d0;
		text-decoration: none;
		color: inherit;
		transition: background 0.15s ease;
	}
	.page-search__item:last-child {
		border-bottom: none;
	}
	.page-search__item:hover {
		background: #fafafa;
	}
	.page-search__thumb {
		flex: 0 0 120px;
		width: 120px;
		height: 120px;
		background: #e8e8e8;
		background-image: linear-gradient(
			to top right,
			transparent calc(50% - 0.5px),
			#bbb calc(50% - 0.5px),
			#bbb calc(50% + 0.5px),
			transparent calc(50% + 0.5px)
		);
		overflow: hidden;
	}
	.page-search__thumb img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		display: block;
	}
	.page-search__body {
		flex: 1;
		min-width: 0;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	.page-search__title {
		font-weight: 700;
		font-size: 1.05rem;
		letter-spacing: 0.02em;
		line-height: 1.35;
		margin: 0 0 10px;
	}
	.page-search__snippet {
		font-size: 0.9rem;
		font-weight: 400;
		line-height: 1.5;
		color: #333;
		margin: 0;
	}
	.page-search__empty {
		padding: 28px 0;
		font-size: 0.95rem;
		color: #555;
	}
</style>
@endsection

@section('content')
<div class="page-search">
	<form class="page-search__form" method="get" action="{{ route('search') }}" role="search">
		<span class="page-search__icon" aria-hidden="true"><i class="fas fa-search"></i></span>
		<input
			type="search"
			name="q"
			id="search_q"
			class="page-search__input"
			value="{{ $q }}"
			placeholder=""
			autocomplete="off"
			aria-label="Search"
		>
	</form>
	<hr class="page-search__divider">
	<div class="page-search__list-wrap">
		@if($q === '')
			<p class="page-search__empty">Type a search term and press Enter.</p>
		@elseif($results->isEmpty())
			<p class="page-search__empty">No results found.</p>
		@else
			@foreach($results as $row)
			<a class="page-search__item" href="{{ url('shop-our-store/product/' . $row['id']) }}">
				<div class="page-search__thumb">
					@if(!empty($row['image_url']))
						<img src="{{ $row['image_url'] }}" alt="">
					@endif
				</div>
				<div class="page-search__body">
					<p class="page-search__title">{{ $row['name'] }}</p>
					@if($row['snippet'] !== '')
						<p class="page-search__snippet">{{ $row['snippet'] }}</p>
					@endif
				</div>
			</a>
			@endforeach
		@endif
	</div>
</div>
@endsection
