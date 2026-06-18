<x-app-layout>

<div style="padding:30px;">

    <h1>Financial Goals</h1>

    <form action="{{ route('financial-goals.store') }}" method="POST">
        @csrf

        <input type="text"
               name="name"
               placeholder="Goal name"
               required>

        <input type="number"
               step="0.01"
               name="target_amount"
               placeholder="Target amount"
               required>

        <input type="number"
               step="0.01"
               name="current_amount"
               placeholder="Current amount"
               value="0">

        <input type="date"
               name="deadline">

        <button type="submit">
            Add Goal
        </button>
    </form>

    <hr><br>

    @foreach($goals as $goal)

        <div style="border:1px solid #ccc;padding:15px;margin-bottom:15px;">

            <h3>{{ $goal->name }}</h3>

            <p>
                Saved:
                {{ $goal->current_amount }} €
                /
                {{ $goal->target_amount }} €
            </p>

            <p>
                Progress:
                {{ round(($goal->current_amount / $goal->target_amount) * 100, 1) }} %
            </p>
<div style="width:300px;background:#ddd;height:20px;">
    <div style="
        width:{{ ($goal->current_amount / $goal->target_amount) * 100 }}%;
        background:green;
        height:20px;">
    </div>
</div>
            <p>
                Deadline:
                {{ $goal->deadline }}
            </p>

            <form action="{{ route('financial-goals.destroy', $goal->id) }}"
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