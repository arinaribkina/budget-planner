<x-app-layout>

<div style="padding:30px;">

<h1>Budget Limits</h1>

<form method="POST" action="{{ route('budget-limits.store') }}">
    @csrf

    <select name="category_id" required>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>

    <input type="number"
           step="0.01"
           name="limit_amount"
           placeholder="Limit Amount">

    <button type="submit">
        Add Limit
    </button>
</form>

<br>

@foreach($limits as $limit)

<div style="border:1px solid gray; padding:15px; margin-bottom:15px;">

   <p>Category: {{ $limit->category->name }}</p>
    <p>Limit: {{ $limit->limit_amount }} €</p>

    <form method="POST"
          action="{{ route('budget-limits.destroy',$limit) }}">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

</div>

@endforeach

</div>

</x-app-layout>