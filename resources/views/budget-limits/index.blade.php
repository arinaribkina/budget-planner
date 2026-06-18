<x-app-layout>

<div style="padding:30px;">

    <h1>Budget Limits</h1>

    <form action="{{ route('budget-limits.store') }}" method="POST">
        @csrf

        <input type="number"
               step="0.01"
               name="limit_amount"
               placeholder="Budget limit"
               required>

        <button type="submit">
            Add Limit
        </button>
    </form>

    <hr><br>

    @foreach($limits as $limit)

        <div style="border:1px solid #ccc;padding:15px;margin-bottom:15px;">

            <h3>Budget Limit</h3>

            <p>
                Limit:
                {{ $limit->limit_amount }} €
            </p>

            <form action="{{ route('budget-limits.destroy', $limit->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button style="background:red;color:white;padding:8px;border:none;">
                    Delete
                </button>

            </form>

        </div>

    @endforeach

</div>

</x-app-layout>