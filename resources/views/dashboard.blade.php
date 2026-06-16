<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-4">
                    Budget Planner Dashboard
                </h1>

                <p class="mb-6">
                    Welcome, {{ Auth::user()->name }}!
                </p>

<a href="{{ route('incomes.index') }}">
    <div class="border p-4 rounded">
        <h3>Income</h3>
        <p>Add and manage your income.</p>
    </div>
</a>

<a href="{{ route('expenses.index') }}">
    <div class="border p-4 rounded">
        <h3>Expenses</h3>
        <p>Add and manage your expenses.</p>
    </div>
</a>

<a href="{{ route('financial-goals.index') }}">
    <div class="border p-4 rounded">
        <h3>Financial Goals</h3>
        <p>Track your savings goals.</p>
    </div>
</a>
<a href="{{ route('categories.index') }}">
    <div class="border p-4 rounded">
        <h3>Categories</h3>
        <p>Manage expense categories.</p>
    </div>
</a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>