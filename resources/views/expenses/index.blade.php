<x-app-layout>

<div style="padding:30px;">

    <h1>Expenses</h1>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf

        <input type="number"
               step="0.01"
               name="amount"
               placeholder="Amount"
               required>

        <input type="text"
               name="description"
               placeholder="Description"
               required>

        <input type="date"
               name="date"
               required>

        <button type="submit">
            Add Expense
        </button>
    </form>

    <hr><br>

    @foreach($expenses as $expense)

        <div style="border:1px solid #ccc;padding:15px;margin-bottom:15px;">

            <h3>{{ $expense->description }}</h3>

            <p>
                Amount:
                {{ $expense->amount }} €
            </p>

            <p>
                Date:
                {{ $expense->date }}
            </p>

            <form action="{{ route('expenses.destroy', $expense->id) }}"
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