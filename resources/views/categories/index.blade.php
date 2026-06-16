<x-app-layout>

<div class="p-6">

    <h1 class="text-3xl font-bold mb-4">
        Categories
    </h1>

    <a href="{{ route('categories.create') }}">
    <button style="background-color:blue;color:white;padding:10px 20px;border:none;border-radius:5px;">
        Add New Category
    </button>


    <br><br>

    @foreach($categories as $category)

        <div class="border p-3 mb-3">

            <h3 class="font-bold">
                {{ $category->name }}
            </h3>

            <p>
                {{ $category->description }}
            </p>

            <form
                action="{{ route('categories.destroy',$category->id) }}"
                method="POST"
            >

                @csrf
                @method('DELETE')

<button
    style="background-color:red;color:white;padding:8px 15px;border:none;border-radius:5px;"
>
    Delete
</button>

            </form>

        </div>

    @endforeach

</div>

</x-app-layout>