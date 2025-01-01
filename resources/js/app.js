import JSConfetti from 'js-confetti';

window.JSConfetti = new JSConfetti();

window.Alpine.data('newSecretSanta', (wire) => ({
    step: 1,
    isLoading: wire.entangle('isLoading'),
    organizer: wire.entangle('organizer'),
    name: wire.entangle('name'),
    gift_exchange_date: wire.entangle('gift_exchange_date'),
    budget: wire.entangle('budget'),
    message: wire.entangle('message'),
    participants: wire.entangle('participants'),
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
    addParticipant() {
        this.participants.push({ name: '' });
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
    enableNext() {
        return this.participants.filter(p => p.name.length > 0).length > 2;
    },
    enableSubmit() {
        return this.organizer && this.name && this.gift_exchange_date && this.budget && this.enableNext();
    }
}));
