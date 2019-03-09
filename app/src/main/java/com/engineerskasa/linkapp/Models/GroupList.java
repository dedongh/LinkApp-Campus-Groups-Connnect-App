package com.engineerskasa.linkapp.Models;

import java.util.List;

public class GroupList {

    List<groups> Groups;
    List<Meetings> Meetings;

    public GroupList(List<groups> groups, List<com.engineerskasa.linkapp.Models.Meetings> meetings) {
        Groups = groups;
        Meetings = meetings;
    }

    public GroupList() {
    }

    public List<groups> getGroups() {
        return Groups;
    }

    public void setGroups(List<groups> groups) {
        Groups = groups;
    }

    public List<com.engineerskasa.linkapp.Models.Meetings> getMeetings() {
        return Meetings;
    }

    public void setMeetings(List<com.engineerskasa.linkapp.Models.Meetings> meetings) {
        Meetings = meetings;
    }
}
