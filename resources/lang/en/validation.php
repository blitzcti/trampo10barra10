<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active' => 'The :attribute is not active.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'age' => 'The minimal age for :attribute must be greater or equal to 16 years.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'already_has_agreement' => 'The :attribute contains a company that already has an agreement.',
    'already_has_internship' => 'The :attribute contains a RA from a student that already has an internship.',
    'already_has_job' => 'The :attribute contains a RA from a student that already has a job.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'cnpj' => 'The :attribute should be a valid CNPJ.',
    'cpf' => 'The :attribute should be a valid CPF.',
    'company_has_course' => 'The course from :attribute is not from a course the company covers.',
    'company_has_email' => 'The company from :attribute does not have an email.',
    'company_has_student_course' => 'The student from :attribute is not from a course the company covers.',
    'company_has_sector' => 'The sector from :attribute is not from a sector the company covers.',
    'company_has_supervisor' => 'The supervisor from :attribute is not from a supervisor that the company has.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The :attribute should be the current password for the user.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'internship_not_active' => 'The :attribute is not in active state.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'max_years' => 'The :attribute contains a student that already passed the allowed years for internships.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min_interval' => 'The :attribute must have an interval of at least :months months.',
    'min_semester' => 'The :attribute contains a student that is not in the required semester.',
    'min_year' => 'The :attribute contains a student that is not in the required grade.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'max_hours' => 'the :attribute must have an 6h interval.',
    'no_agreement' => 'The selected :attribute does not have an active agreement.',
    'not_active' => 'The selected :attribute is not active.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'ra' => 'The :attribute field must be a valid RA.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'same_course' => 'The :attribute contains a RA of a student from a different course.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'temp_of' => 'The :attribute must have a different user.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Name',
        'color' => 'Color',
        'active' => 'Active',
        'startDate' => 'Start Date',
        'endDate' => 'End Date',
        'date' => 'Date',

        'current_password' => 'Current Password',
        'password' => 'Password',
        'group' => 'Group',

        'tempOf' => 'Temporary of',

        'maxYears' => 'Maximum Years',
        'minYear' => 'Minimum Year',
        'minSemester' => 'Minimum Semester',
        'minHour' => 'Minimum Hours',
        'minMonth' => 'Minimum Months',
        'minMonthCTPS' => 'Minimum Months (CTPS)',
        'minGrade' => 'Minimum Grade',
        'hasConfig' => 'Add Config?',

        'supervisorName' => 'Supervisor Name',
        'supervisorEmail' => 'Supervisor Email',
        'supervisorPhone' => 'Supervisor Phone',

        'company' => 'Company',

        'cep' => 'CEP',
        'uf' => 'State',
        'city' => 'City',
        'street' => 'Street',
        'number' => 'Number',
        'district' => 'District',
        'phone' => 'Phone',
        'email' => 'Email',
        'extension' => 'Extension Line',
        'agreementExpiration' => 'Agreement Validity',

        'cpfCnpj' => 'CPF / CNPJ',
        'ie' => 'I.E.',
        'companyName' => 'Name',
        'representativeName' => 'Representative Name',
        'representativeRole' => 'Representative Role',
        'sector' => 'Sector',
        'sectors' => 'Sectors',
        'course' => 'Course',
        'courses' => 'Courses',
        'hasAgreement' => 'Add Agreement?',

        'description' => 'Description',

        'ra' => 'RA',
        'activities' => 'Activities',
        'observation' => 'Observation',
        'supervisor' => 'Supervisor',
        'protocol' => 'Protocol',
        'ctps' => 'CTPS',
        'hasSchedule' => 'Has Schedule?',
        'has2Schedules' => 'Has 2 Schedules?',

        'grades' => 'Grades',
        'periods' => 'Periods',
        'internships' => 'Internships',
        'students' => 'Students',

        'subject' => 'Subject',

        'monS' => 'Monday (Start)',
        'monE' => 'Monday (End)',
        'monS2' => 'Monday (Start - 2nd schedule)',
        'monE2' => 'Monday (End - 2nd schedule)',
        'tueS' => 'Tuesday (Start)',
        'tueE' => 'Tuesday (End)',
        'tueS2' => 'Tuesday (Start - 2nd schedule)',
        'tueE2' => 'Tuesday (End - 2nd schedule)',
        'wedS' => 'Wednesday (Start)',
        'wedE' => 'Wednesday (End)',
        'wedS2' => 'Wednesday (Start - 2nd schedule)',
        'wedE2' => 'Wednesday (End - 2nd schedule)',
        'thuS' => 'Thursday (Start)',
        'thuE' => 'Thursday (End)',
        'thuS2' => 'Thursday (Start - 2nd schedule)',
        'thuE2' => 'Thursday (End - 2nd schedule)',
        'friS' => 'Friday (Start)',
        'friE' => 'Friday (End)',
        'friS2' => 'Friday (Start - 2nd schedule)',
        'friE2' => 'Friday (End - 2nd schedule)',
        'satS' => 'Saturday (Start)',
        'satE' => 'Saturday (End)',
        'satS2' => 'Saturday (Start - 2nd schedule)',
        'satE2' => 'Saturday (End - 2nd schedule)',

        'reportDate' => 'Report Date',
    ],
];
