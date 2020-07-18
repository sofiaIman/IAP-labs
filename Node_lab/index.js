const mysql = require('mysql');
const express = require('express');
var app = express();
const bodyparser = require('body-parser');
const { response } = require('express');

app.use(bodyparser.json());

var mysqlConnection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'studentsdb'
});

mysqlConnection.connect((err) => {
    if (!err)
    console.log('DB connection successful');
    else
    console.log('DB connection failed \n Error : ' + JSON.stringify(err, undefined, 2));

});
app.listen(30000, ()=>console.log('Express server is running at port no : 30000'));

//get all students
app.get('/students',(req,res)=>{
    mysqlConnection.query('SELECT * FROM students',(err, rows, fields)=>{
        if(!err)
        //console.log(rows[0].StudentID);
        res.send(rows);
        else
        console.log(err);
    })
});

//get a student 
app.get('/students/:id',(req,res)=>{
    mysqlConnection.query('SELECT * FROM students WHERE StudentID = ? ',[req.params.id],(err, rows, fields)=>{
        if(!err)
        
        res.send(rows);
        else
        console.log(err);
    })
});

//delete a student 
app.delete('/students/:id',(req,res)=>{
    mysqlConnection.query('DELETE FROM students WHERE StudentID = ? ',[req.params.id],(err, rows, fields)=>{
        if(!err)
        res.send('Deleted Succesfully');
        else
        console.log(err);
    })
});

//insert a student 
app.post("/students", function(request,response){

    //console.log(request.body);return false;
    //use the above commented method to insert data in the terminal 


    //insert records in database
    var Name = request.body.Name;
    var Adm = request.body.Adm;
    var Course = request.body.Course;

    mysqlConnection.query("INSERT INTO students (Name, Adm, Course) values (?, ?, ?)", [Name, Adm, Course], function(error, result, fields){
        response.json({
            status: 1,
            message: "Data inserted successfully",
            data: result
        });

    
});
});
