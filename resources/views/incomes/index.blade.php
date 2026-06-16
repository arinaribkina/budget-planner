<x-app-layout>

<div style="padding:30px;">

    <h1>Income</h1>

    <form method="POST" action="{{ route('incomes.store') }}">
        @csrf

        <div style="margin-bottom:10px;">
            <label>Amount</label><br>
            <input type="number" step="0.01" name="amount">
        </div>

        <div style="margin-bottom:10px;">
            <label>Description</label><br>
            <input type="text" name="description">
        </div>

        <div style="margin-bottom:10px;">
            <label>Date</label><br>
            <input type="date" name="date">
        </div>

        <button
            type="submit"
            style="background:blue;color:white;padding:10px;border:none;">
            Add Income
        </button>
    </form>

    <hr><br>

    @foreach($incomes as $income)

        <div style="border:1px solid gray;padding:10px;margin-bottom:10px;">

            <strong>{{ $income->amount }} €</strong><br>

            {{ $income->description }}<br>

            {{ $income->date }}

            <form
                method="POST"
                action="{{ route('incomes.destroy', $income->id) }}"
                style="margin-top:10px;">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    style="background:red;color:white;padding:5px;border:none;">
                    Delete
                </button>

            </form>

        </div>

    @endforeach

</div>

</x-app-layout>