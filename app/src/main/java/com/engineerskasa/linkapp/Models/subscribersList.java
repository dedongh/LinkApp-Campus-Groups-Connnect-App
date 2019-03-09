package com.engineerskasa.linkapp.Models;

import java.util.List;

public class subscribersList {
    List<subscribers> Subscribers;

    public subscribersList(List<subscribers> subscribers) {
        Subscribers = subscribers;
    }

    public subscribersList() {
    }

    public List<subscribers> getSubscribers() {
        return Subscribers;
    }

    public void setSubscribers(List<subscribers> subscribers) {
        Subscribers = subscribers;
    }
}
