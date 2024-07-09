## App Help Ti

App Help Ti is a PHP-based support ticket system where users can access the system through two profiles: administrator and user. The system allows users to open and consult support tickets.

<hr>

### Recursos

#### Perfil de Usuário

<ul>
  <li>Administrator: Can view all open tickets.</li>
  <li>User: Can only view the tickets they have created.</li>
</ul>

#### Abertura e Consulta de Chamados

<ul>
  <li>Users can open and track support tickets.</li>
</ul>

<hr>

### Detalhes Técnicos

#### Backend

Entirely developed in PHP.

#### Server

Uses Apache from Xampp.

#### File Structure

<ul>
  <li>Public files: Stored in the <strong>'htdocs'</strong> folder.</li>
  <li>Data Storage: Tickets are stored in a .txt file within the <strong>'xampp'</strong> folder, providing a secure backend for the web application.</li>
  <li>Access Control: Managed through <strong>valida_login.php</strong> using an array for user authentication, eliminating the need for a database.</li>
</ul>

<hr>

### Integração dos Dados

The .txt file storing ticket data can be imported into Excel using Power Query, leveraging the delimiter '#' to structure the data. 
This structured data can then be used to create dashboards in Power BI, providing a comprehensive overview of the support tickets.

<hr>

### Tecnologias

![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![Microsoft Excel](https://img.shields.io/badge/Microsoft_Excel-217346?style=for-the-badge&logo=microsoft-excel&logoColor=white)
![Power Bi](https://img.shields.io/badge/power_bi-F2C811?style=for-the-badge&logo=powerbi&logoColor=black)



