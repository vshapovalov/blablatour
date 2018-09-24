@php

    $formName = request('form_name');

    $firstName = request('first_name', 'dummy_firstname');
    $lastName = request('last_name', '');
    $phone = request('phone', 'dummy_phone');
    $email = request('email', 'dummy_email');

    if ($formName == 'get_tour') {
        $persons = request('persons', 0);
        $target = request('target');
        $order = \App\Order::create([
        	'name' => $firstName,
            'phone' => $phone,
            'email' => $email,
            'target_name' => $target,
            'persons' => $persons
        ]);

        session()->flash('success_message', 'Заявка успешно отправлена!');
        session()->save();

        \Illuminate\Support\Facades\Mail::to( crud_settings('admin.mail') )->send( new \App\Mail\SendOrder( $order ));

        redirect_now( page_route('tours'));
    }

    if ($formName == 'get_excursion') {
        $targetDate = request('target_date');
        $target = request('target');
        $order = \App\Order::create([
        	'name' => $firstName . ' ' . $lastName,
            'phone' => $phone,
            'email' => $email,
            'target_name' => $target,
            'target_date' => $targetDate,
        ]);

        session()->flash('success_message', 'Заявка успешно отправлена!');
        session()->save();

        \Illuminate\Support\Facades\Mail::to( crud_settings('admin.mail') )->send( new \App\Mail\SendOrder( $order ));

        redirect_now( page_route('excursions'));
    }

    if ($formName == 'subscribe') {

        $subscribe = \App\Subscriber::create([
            'email' => $email
        ]);

        session()->flash('success_message', 'Подписка успешно оформлена!');
        session()->save();

        \Illuminate\Support\Facades\Mail::to( crud_settings('admin.mail') )->send( new \App\Mail\Subsribing( $subscribe ));
    }

    if ($formName == 'send_message') {
        $subject = request('subject');
        $message = request('message');

        $messageObject = \App\Message::create([
            'name' => $firstName . ' ' . $lastName,
            'phone' => $phone,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);

        session()->flash('success_message', 'Сообщение отправлено');
        session()->save();

        \Illuminate\Support\Facades\Mail::to( crud_settings('admin.mail') )->send( new \App\Mail\SendMessage( $messageObject ));
    }

    redirect_now( page_route('success_message'))

@endphp

<h1>success_message</h1>