<?php

namespace Botble\RealEstate\Forms\Fronts;

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\RealEstate\Http\Requests\SendConsultRequest;
use Botble\Theme\FormFront;

class ConsultForm extends FormFront
{
    public function setup(): void
    {
        $this
            ->contentOnly()
            ->formClass('contact-form')
            ->setValidatorClass(SendConsultRequest::class)
            ->setUrl(route('public.send.consult'))
            ->add(
                'name',
                TextField::class,
                TextFieldOption::make()
                    ->required()
                    ->label(__('Name'))
                    ->placeholder('Johny Dane'),
            )
            ->add(
                'phone',
                TextField::class,
                TextFieldOption::make()
                    ->required()
                    ->label(__('Phone'))
                    ->placeholder('Ex 0123456789'),
            )
            ->add(
                'email',
                TextField::class,
                TextFieldOption::make()
                    ->required()
                    ->label(__('Email'))
                    ->placeholder('email@example.com'),
            )
            ->add(
                'content',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->required()
                    ->label(__('Message'))
                    ->placeholder(__('Enter your message...')),
            )
            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->label(__('Send Message'))
            );
    }
}
