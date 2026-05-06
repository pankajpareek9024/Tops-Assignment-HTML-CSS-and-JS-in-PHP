function loadTickets(type){

    fetch("ajax/getTickets.php?type=" + type)
    .then(res => res.json())
    .then(data => {

        let output = "";

        if(data.length === 0){
            output = "<tr><td colspan='5'>No tickets found</td></tr>";
        } else {
            data.forEach(ticket => {
                output += `
                    <tr>
                        <td>${ticket.id}</td>
                        <td>${ticket.title}</td>
                        <td>${ticket.assigned_to}</td>
                        <td>${ticket.date}</td>
                        <td>${ticket.status}</td>
                    </tr>
                `;
            });
        }

        document.getElementById("ticketBody").innerHTML = output;
    });
}

window.onload = function(){
    loadTickets('Open');
}