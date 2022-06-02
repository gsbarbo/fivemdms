<x-staff-layout>
    <div class="container w-full mx-auto lg:w-3/5">
        <x-bladewind.card title="Reports">

            <x-bladewind.table>
                <tr class="dark:text-off-white">
                    <th>ID</th>
                    <th>Submitter</th>
                    <th>Report</th>
                    <th>Actions</th>
                </tr>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->user->display_name }}</td>
                        <td>{{ $report->report_form->title }}</td>
                        <td>
                            <a href="{{ route('portal.staff.reports.show', $report->id) }}" <x-bladewind.button
                                size="tiny">View</x-bladewind.button>
                        </td>
                    </tr>
                @endforeach
            </x-bladewind.table>

        </x-bladewind.card>
    </div>

</x-staff-layout>
