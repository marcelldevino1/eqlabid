<form action="{{ route('method-actions.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="import_file" class="block text-sm font-medium text-gray-700">Choose Excel File</label>
        <input type="file" name="import_file" id="import_file"
               class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
               required>
    </div>

    <div class="mb-4">
        <a href="{{ asset('templates/method_actions_import_template.xlsx') }}"
           class="text-sm text-blue-600 hover:underline">Download Template</a>
    </div>

    <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeImportModal()"
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</button>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Upload</button>
    </div>
</form>
