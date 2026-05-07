<x-layout title="TODO">
<form method="POST" action="/todo">
    @csrf
<div class="col-span-full">
          <label for="todo" class="block text-sm/6 font-medium text-gray-900">new todo</label>
          <div class="mt-2">
            <textarea id="todo" name="todo" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about yourself.</p>
        </div>
        <div class="mt-6 flex items-center justify-first gap-x-6 gap-y-10">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>
<div class="mt-6 text-dark">
    <h1>Here is your todo list</h1>
    @foreach ($todo as $todo)
    <li>{{$todo->todo}}</li>
        
    @endforeach
</div>
</x-layout>