const newSecretSanta = () => ({
    step: 1,
    participants: [{
        name: '',
    }],
    next() {
        this.step++;
    },
    back() {
        this.step--;
    },
    removeParticipant(index) {
        if (this.participants.length === 1) {
            return;
        }
        if (index === this.participants.length - 1) {
            return;
        }

        if (this.participants[index].name.length > 0) {
            return;
        }

        this.participants.splice(index, 1);
    },
    checkParticipants() {
        const lastParticipant = this.participants.pop();
        if (lastParticipant.name) {
            this.participants.push(lastParticipant);
            this.participants.push({ name: '' });
        } else {
            this.participants.push(lastParticipant);
        }
    },
});

window.newSecretSanta = newSecretSanta;