<?php

namespace App\Mail;

use App\Models\Proposal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InternshipProposalMail extends Mailable
{
    use Queueable, SerializesModels;

    private $student;
    private $proposal;

    /**
     * Create a new message instance.
     *
     * @param $student
     * @param Proposal $proposal
     */
    public function __construct($student, Proposal $proposal)
    {
        $this->student = $student;
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('informatica@cti.feb.unesp.br')
            ->view('emails.internshipProposal')
            ->subject('Vaga de estágio')
            ->with([
                'student' => $this->student,
                'proposal' => $this->proposal,
            ]);
    }
}
