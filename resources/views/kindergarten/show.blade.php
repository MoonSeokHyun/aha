@extends('layouts.layout')

@section('content')


<div class="container mt-5">
    <h1 class="text-center">{{ $kindergarten->KindergartenName }}</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr><th>ID</th><td>{{ $kindergarten->id }}</td></tr>
                    <tr><th>Education Office Name</th><td>{{ $kindergarten->EducationOfficeName }}</td></tr>
                    <tr><th>Education Support Office Name</th><td>{{ $kindergarten->EducationSupportOfficeName }}</td></tr>
                    <tr><th>Kindergarten Name</th><td>{{ $kindergarten->KindergartenName }}</td></tr>
                    <tr><th>Establishment Type</th><td>{{ $kindergarten->EstablishmentType }}</td></tr>
                    <tr><th>Representative Name</th><td>{{ $kindergarten->RepresentativeName }}</td></tr>
                    <tr><th>Principal Name</th><td>{{ $kindergarten->PrincipalName }}</td></tr>
                    <tr><th>Establishment Date</th><td>{{ $kindergarten->EstablishmentDate }}</td></tr>
                    <tr><th>Opening Date</th><td>{{ $kindergarten->OpeningDate }}</td></tr>
                    <tr><th>Address</th><td>{{ $kindergarten->Address }}</td></tr>
                    <tr><th>Phone Number</th><td>{{ $kindergarten->PhoneNumber }}</td></tr>
                    <tr><th>Website</th><td>{{ $kindergarten->Website }}</td></tr>
                    <tr><th>Operating Hours</th><td>{{ $kindergarten->OperatingHours }}</td></tr>
                    <tr><th>Class Count 3 Years Old</th><td>{{ $kindergarten->ClassCount3YearsOld }}</td></tr>
                    <tr><th>Class Count 4 Years Old</th><td>{{ $kindergarten->ClassCount4YearsOld }}</td></tr>
                    <tr><th>Class Count 5 Years Old</th><td>{{ $kindergarten->ClassCount5YearsOld }}</td></tr>
                    <tr><th>Mixed Class Count</th><td>{{ $kindergarten->MixedClassCount }}</td></tr>
                    <tr><th>Special Class Count</th><td>{{ $kindergarten->SpecialClassCount }}</td></tr>
                    <tr><th>Total Approved Capacity</th><td>{{ $kindergarten->TotalApprovedCapacity }}</td></tr>
                    <tr><th>Capacity 3 Years Old</th><td>{{ $kindergarten->Capacity3YearsOld }}</td></tr>
                    <tr><th>Capacity 4 Years Old</th><td>{{ $kindergarten->Capacity4YearsOld }}</td></tr>
                    <tr><th>Capacity 5 Years Old</th><td>{{ $kindergarten->Capacity5YearsOld }}</td></tr>
                    <tr><th>Mixed Recruitment Capacity</th><td>{{ $kindergarten->MixedRecruitmentCapacity }}</td></tr>
                    <tr><th>Special Class Recruitment Capacity</th><td>{{ $kindergarten->SpecialClassRecruitmentCapacity }}</td></tr>
                    <tr><th>Number Of Children 3 Years Old</th><td>{{ $kindergarten->NumberOfChildren3YearsOld }}</td></tr>
                    <tr><th>Number Of Children 4 Years Old</th><td>{{ $kindergarten->NumberOfChildren4YearsOld }}</td></tr>
                    <tr><th>Number Of Children 5 Years Old</th><td>{{ $kindergarten->NumberOfChildren5YearsOld }}</td></tr>
                    <tr><th>Number Of Mixed Children</th><td>{{ $kindergarten->NumberOfMixedChildren }}</td></tr>
                    <tr><th>Number Of Special Children</th><td>{{ $kindergarten->NumberOfSpecialChildren }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
