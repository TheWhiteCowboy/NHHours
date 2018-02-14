<div class="table-responsive">
<table id="working-hours" class="table">
    <thead>
    <tr>
        <th>AFDELING</th>
        @if(Entrust::hasRole('admin'))
            <th>MEDEWERKER</th>
        @endif
        <th>DATUM</th>
        <th>VAN</th>
        <th>PAUZE</th>
        <th>TOT</th>
        <th>TOTAAL</th>
    </tr>
    </thead>
    <tbody id="working-hours-table">
    @foreach($workingHours as $workingHour)
        <tr>
            <td>{{$workingHour->department->name}}</td>
            @if(Entrust::hasRole('admin'))
                <td>{{$workingHour->user->fullName()}}</td>
            @endif
            <td>{{$workingHour->date->format('d-m-Y')}}</td>
            <td class="txt-oflo">{{$workingHour->from->format('H:i') }}</td>
            <td>{{ $workingHour->getBreak()->format('H:i') }}</td>
            <td class="txt-oflo">{{$workingHour->to->format('H:i') }}</td>
            <td><span class="text-success">{{ $workingHour->totalHours }}</span></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $workingHours->links() }}
