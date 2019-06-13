<table>
    <thead>
	<tr>
	    @foreach($data[0] as $key => $value)
		<th style="background: #FA4004; font-weight:bold; border: black .5px solid;">{{ ucfirst($key) }}</th>
	    @endforeach
    	</tr>
    </thead>
    <tbody>
    @foreach($data as $row)
    	<tr>
        @foreach ($row as $value)
    	    <td style="font-weight:bold; border: black .5px solid;">{{ $value }}</td>
        @endforeach        
	</tr>
    @endforeach
    </tbody>
</table>