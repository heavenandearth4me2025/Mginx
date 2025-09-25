@extends('rough.layouts.app')

@section('title', 'Users info')

@section('content')
<main class="p-4 lg:ml-64">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-bold mb-4">Users</h2>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Job Title</th>
            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Office</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($users as $user)
            @php $info = $user['info']; @endphp
            <tr>
              <td class="px-4 py-2 whitespace-nowrap">{{ $info['userPrincipalName'] ?? 'N/A' }}</td>
              <td class="px-4 py-2 whitespace-nowrap">{{ $info['mail'] ?? 'N/A' }}</td>
              <td class="px-4 py-2 whitespace-nowrap">{{ $info['mobilePhone'] ?? 'N/A' }}</td>
              <td class="px-4 py-2 whitespace-nowrap">{{ $info['jobTitle'] ?? 'N/A' }}</td>
              <td class="px-4 py-2 whitespace-nowrap">{{ $info['officeLocation'] ?? 'N/A' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</main>
@endsection
