package com.engineerskasa.linkapp.Models;

import java.util.List;

public class EventsMain {

    List<events> Events;

    public EventsMain(List<events> events) {
        Events = events;
    }

    public EventsMain() {
    }

    public List<events> getEvents() {
        return Events;
    }

    public void setEvents(List<events> events) {
        Events = events;
    }
}
