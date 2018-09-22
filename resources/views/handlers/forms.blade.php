@php

    $formName = request('form_name');

    $firstName = request('first_name', 'dummy_firstname');
    $lastName = request('last_name', 'dummy_lastname');
    $phone = request('phone', 'dummy_phone');
    $email = request('email', 'dummy_email');

    if ($formName == 'get_tour') {
        $target = request('target');
        $order = \App\Order::create([
        	'name' => $firstName . ' ' . $lastName,
            'phone' => $phone,
            'email' => $email,
            'target_name' => $target,
        ]);

        session()->flash('success_message', 'Заявка успешно отправлена!');
        session()->save();

        \Illuminate\Support\Facades\Mail::to( crud_settings('admin.mail') )->send( new \App\Mail\SendOrder( $order ));
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