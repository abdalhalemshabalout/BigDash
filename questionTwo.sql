-- 1
SELECT t.TenantName FROM tenants AS t 
INNER JOIN AptTenants AS at1 ON t.TenantID = at1.TenantID 
INNER JOIN AptTenants AS at2 ON t.TenantID = at2.TenantID AND at1.AptID <> at2.AptID;

-- 2
SELECT bu.BuildingName, COUNT(req.RequestID) AS open_requests FROM buildings AS bu 
LEFT JOIN Apartments AS apt ON b.BuildingID = apt.BuildingID 
LEFT JOIN Requests AS req ON apt.id = req.AptID AND req.Status = 'Open'
GROUP BY bu.BuildingID;


-- 3
UPDATE Requests 
SET Status = 'Closed' 
WHERE AptID IN (SELECT apt.AptID FROM Apartments AS apt WHERE apt.buildingID = 11);