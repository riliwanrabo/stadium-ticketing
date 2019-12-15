<!-- Ticket Modal -->
<div class="modal fade" id="TicketModal" tabindex="-1" role="dialog" aria-labelledby="TicketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
           <div class="print-area">
            <div class="modal-header">
                <h5 class="modal-title bold text-info" id="TicketModalLabel">---</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Fullname: <b class="fullname"></b></h5>
                <h5 class="teams"></h5>
                <h5>Date: <span class="ticket_date"></span></h5>
                <h5>Time: <span class="ticket_time"></span></h5>
                <h5>Match Details</h5> <hr>
                {{-- <p class="teams"></p> --}}
                <h5>Price details: <b>=N= 5,000</b></h5>
                
                
            </div>
           </div>
            <div class="modal-footer">
                <input type="hidden" id="fixture_id" value="">
                <button type="button" class="btn btn-success" id="print_ticket">Print</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>