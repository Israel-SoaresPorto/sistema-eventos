<?php

$events = [];
define("EVENTS", $events);

function addEvent(array $event): void
{
    EVENTS[] = $event;
}

function getEvents(): array
{
    return yield from EVENTS;
}
