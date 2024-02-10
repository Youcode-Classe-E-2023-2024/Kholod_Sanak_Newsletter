<?php
    ?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>subscribers list</title>
</head>
<body>

<table class="w-full min-w-[640px] table-auto">
    <thead>
    <tr>
        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Emails</p>
        </th>
        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Status</p>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($subscribers as $subscriber)
        <tr>
            <td class="py-3 px-5 border-b border-blue-gray-50">
                <div class="flex items-center gap-4">
                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">{{ $subscriber->email }}</p>
                </div>
            </td>
            <td class="py-3 px-5 border-b border-blue-gray-50">
                <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{ $subscriber->unsub }}</p>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


</body>
</html>
