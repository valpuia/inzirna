@props(['path', 'imagePath', 'name', 'buttonName'])

<a href="{{ $path }}"
    class="block w-full group relative transition duration-300 ease-in-out transform bg-center bg-cover h-48 md:h-96 hover:scale-105 md:rounded-xl md:border"
    style="background-image:url('{{ $imagePath }}')">
    <div class="hidden md:group-hover:flex justify-center items-center top-0 absolute w-full">
        <span class="font-semibold uppercase pt-5 text-2xl">
            {{ $name }}
        </span>
    </div>
    <div
        class="md:hidden md:group-hover:flex justify-between md:justify-center items-center bottom-0 absolute bg-gradient-to-t from-black via-gray-800 to-gray-800/10 p-6 w-full text-white rounded-b-xl">
        <span class="text-2xl border border-black px-3 rounded-full bg-black uppercase">
            {{ $buttonName }}
        </span>
        <span class="md:hidden uppercase float-right">
            {{ $name }}
        </span>
    </div>
</a>
