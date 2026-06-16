<x-app-layout>

<div class="p-6">

    <h1 class="text-3xl font-bold mb-4">
        Add Category
    </h1>

    <form method="POST" action="{{ route('categories.store') }}">

        @csrf

        <div class="mb-4">

            <label>Category name</label>

            <input
                type="text"
                name="name"
                class="border p-2 w-full"
            >

        </div>

        <div class="mb-4">

            <label>Description</label>

            <textarea
                name="description"
                class="border p-2 w-full"
            ></textarea>

        </div>

       <button
    type="submit"
    style="background-color:blue;color:white;padding:10px 20px;border:none;border-radius:5px;"
>
    Save Category
</button>

    </form>

</div>

</x-app-layout>