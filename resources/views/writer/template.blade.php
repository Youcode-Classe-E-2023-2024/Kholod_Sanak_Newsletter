<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Writer Dashboard</title>
</head>
<body>

<div class=" mt-20 bg-gray-50/50">
    @include('inc/sidebarWriter')


    {{--            List--}}
    <div class="xl:w-full  mb-4 grid grid-cols-1 gap-6 xl:grid-cols-3 ml-80 ">

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
            <div class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">

                <div></div>
                <a href="{{route('addTemplate')}}"
                        class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
              <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                  add template
{{--               <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;stroke:#000;stroke-linejoin:round;stroke-width:2px;}</style></defs><title/><g data-name="307-Email Add" id="_307-Email_Add"><polyline class="cls-1" points="15 27 1 27 1 5 31 5 31 15"/><polyline class="cls-1" points="1 5 16 16 31 5"/><line class="cls-1" x1="25" x2="25" y1="17" y2="27"/><line class="cls-1" x1="30" x2="20" y1="22" y2="22"/></g></svg>              </span>--}}
                </a>
            </div>
            <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
                {{--                table--}}
                {{-- table --}}
                <table class="w-full min-w-[640px] table-auto">
                    <thead>
                    <tr>
                        {{-- template --}}
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Template</p>
                        </th>
                        {{-- created at --}}
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Created at</p>
                        </th>
                        {{-- status --}}
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Status</p>
                        </th>
                        {{-- Action --}}
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Action</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletters as $newsletter)
                        <tr>
                            {{-- media --}}
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">{{ $newsletter->titre }}</p>
                            </td>
                            {{-- created at --}}
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{ $newsletter->created_at }}</p>
                            </td>
                            {{-- status --}}
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{ $newsletter->status }}</p>
                            </td>
                            {{-- action --}}
                            <td>
                                <div class="flex gap-2">
                                    <form>
                                        <button type="submit" class="mt-2 px-2 py-1 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 cursor-pointer">
                                            Edit
                                        </button>
                                    </form>
                                    <form method="post" action="{{ route('send_newsletter_template', ['id' => $newsletter->id]) }}">
                                        @csrf
                                        <button type="submit" class="mt-2 px-2 py-1 bg-green-500 text-white font-bold rounded hover:bg-green-700 cursor-pointer">
                                            Send
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    {{--function editTemplate(newsletterId) {--}}
    {{--    // Redirect to edit route with the newsletter ID--}}
    {{--    window.location.href = "{{ route('edit_newsletter_template', ['id' => '']) }}/" + newsletterId;--}}
    {{--}--}}

    {{--function sendTemplate(newsletterId) {--}}
    {{--    // Redirect to send route with the newsletter ID--}}
    {{--    window.location.href = "{{ route('send_newsletter_template', ['id' => '']) }}".replace('','/') + newsletterId;--}}
    {{--}--}}
</script>

</body>
</html>
